<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Projects;
use App\Models\ProjectMembers;
use App\Models\Tasks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function managerDashboard()
    {
        //echo '<pre>';print_r(Auth::User());die;

        return view('manager.dashboard');
    }

    public function employeeDashboard()
    {
        //echo '<pre>';print_r(Auth::User());die;

        return view('team_member.dashboard');
    }

    public function getProjects()
    {
        //echo '<pre>';print_r(Auth::User());die;

        $projects = DB::table('projects')->select('*')->where('owner_id',Auth::user()->id)->get();

        //print_r($projects);die;

        if(count($projects) > 0)
        {
            $status = array('success'=>200,'data'=>$projects,'data_count'=>count($projects));
            return response()->json($status);
        }
        else
        {
            $status = array('error'=>404);
            return response()->json($status);
        }
    }

    public function createProject(Request $request)
    {
        //echo '<pre>';print_r(Auth::User());die;

        if($request->isMethod('post')) {

            $owner_id=Auth::user()->id;

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'owner_id' => 'required',
                'end_date' => 'required',
                'start_date' => 'required',
                'created_at' => 'required',
            ]);

            if(Projects::create($request->all()))
            {
                $status = array('success'=>200);
                return response()->json($status);
            }
            else
            {
                $status = array('error'=>404);
                return response()->json($status);
            }
        }

        return view('manager.createProject');
    }

    public function showProjects()
    {
        return view('manager.showProjects');
    }

    public function showTeamMembers($id)
    {
        //echo $id;die;
        $members = User::whereNOTIn('id', function($query) use ($id){
            $query->select('user_id')
            ->from('project_members')
            ->where('project_id', $id);
        })->where('report_to',Auth::User()->id)->get()->toArray();

        //print_r($members);die;

        $added_members = User::whereIn('id', function($query) use ($id){
            $query->select('user_id')
            ->from('project_members')
            ->where('project_id', $id);
        })->where('report_to',Auth::User()->id)->get()->toArray();

        
        $status = array('success'=>200,'data1'=>$members,'data2'=>$added_members);
        return response()->json($status);
        /*
        }
        else
        {
            $status = array('error'=>404);
            return response()->json($status);
        }
        */
       
    }

    public function addTeamMembers(Request $request)
    {
        //print_r($request->all());die;
        if(ProjectMembers::create($request->all()))
        {
            $status = array('success'=>200);
            return response()->json($status);
        }
    }

    public function removeTeamMembers($pid, $uid)
    {
        if(ProjectMembers::where(['project_id'=>$pid,'user_id'=>$uid])->delete())
        {
            $status = array('success'=>200);
            return response()->json($status);
        }
    }

    public function createTask(Request $request)
    {
        //echo '<pre>';print_r(Auth::User());die;

        if($request->isMethod('post')){

            $owner_id=Auth::user()->id;

            $validator = Validator::make($request->all(), [
                'task_name' => 'required',
                'description' => 'required',
                'project_id' => 'required',
                'assigned_to' => 'required',
                'end_date' => 'required',
                'status' => 'required',
                'start_date' => 'required',
                'created_at' => 'required',
            ]);

            if(Tasks::create($request->all()))
            {
                $status = array('success'=>200);
                return response()->json($status);
            }
            else
            {
                $status = array('error'=>404);
                return response()->json($status);
            }
        }

        return view('manager.createTask');
    }

    public function showTasks()
    {
        return view('manager.showTasks');
    }

    public function showEmpTasks()
    {
        return view('team_member.showTasks');
    }

    public function getTasks()
    {
        $owner_id = Auth::user()->id;
        //$projects = DB::table('tasks')->select('*')->where('owner_id',Auth::user()->id)->get();

        $tasks = Tasks::select('projects.name','tasks.*', 'users.fname', 'users.lname')->whereIn('project_id', function($query) use ($owner_id){
            $query->select('id')
            ->from('projects')
            ->where('owner_id', $owner_id);
        })
        ->join('projects', 'projects.id', '=', 'tasks.project_id')
        ->join('users', 'users.id', '=', 'tasks.assigned_to')
        ->get()->toArray();

        //print_r($tasks);die;

        $comp_tasks = Tasks::select('tasks.*')->whereIn('project_id', function($query) use ($owner_id){
                            $query->select('id')
                            ->from('projects')
                            ->where('owner_id', $owner_id);
                        })->where(['tasks.status'=>'Completed'])->get()->toArray();

        $pend_tasks = Tasks::select('tasks.*')->whereIn('project_id', function($query) use ($owner_id){
                            $query->select('id')
                            ->from('projects')
                            ->where('owner_id', $owner_id);
                        })->whereNotIn('tasks.status',['Completed'])->get()->toArray();

        
        $status = array('success'=>200,'data'=>$tasks,
            'data_count'=>count($tasks),
            'comp_data_count'=>count($comp_tasks),
            'pend_data_count'=>count($pend_tasks)
        );

        return response()->json($status);
        
    }

    public function getMembers()
    {
        $members = User::where('report_to', Auth::user()->id)->get()->toArray();

        //print_r($members);die;
        if(count($members) > 0)
        {
            $status = array('success'=>200,'data'=>$members,'data_count'=>count($members));
            return response()->json($status);
        }
    }

    public function getEmpProjects()
    {
        //echo '<pre>';print_r(Auth::User());die;

        $projects = DB::table('project_members')->select('*')->where('user_id',Auth::user()->id)->get();

        //print_r($projects);die;

        if(count($projects) > 0)
        {
            $status = array('success'=>200,'data'=>$projects,'data_count'=>count($projects));
            return response()->json($status);
        }
        else
        {
            $status = array('error'=>404);
            return response()->json($status);
        }
    }

    public function getEmpTasks($id = 0)
    {
        $user_id = Auth::user()->id;
        //$projects = DB::table('tasks')->select('*')->where('owner_id',Auth::user()->id)->get();
        if($id == 0)
        {
            $tasks = Tasks::select('projects.name','tasks.*',DB::raw("CONCAT(users.fname,' ',users.lname) as full_name"),'users.lname')->whereIn('project_id', function($query) use ($user_id){
                $query->select('project_id')
                ->from('project_members')
                ->where('user_id', $user_id);
            })
            ->join('projects', 'projects.id', '=', 'tasks.project_id')
            ->join('users', 'users.id', '=', 'projects.owner_id')
            ->where(['assigned_to'=>$user_id])
            ->get()->toArray();

        }
        else
        {
            $tasks = Tasks::select('projects.name','tasks.*',DB::raw("CONCAT(users.fname,' ',users.lname) as full_name"),'users.lname')->whereIn('project_id', function($query) use ($id, $user_id){
                $query->select('project_id')
                ->from('project_members')
                ->where('user_id', $user_id);
            })
            ->join('projects', 'projects.id', '=', 'tasks.project_id')
            ->join('users', 'users.id', '=', 'projects.owner_id')
            ->where(['tasks.id'=>$id])
            ->get()->toArray();
        }

        $comp_tasks = Tasks::select('tasks.*')->where(['tasks.status'=>'Completed'])->where(['assigned_to'=>$user_id])
            ->get()->toArray();

        $pend_tasks = Tasks::select('tasks.*')->whereNotIn('tasks.status',['Completed'])->where(['assigned_to'=>$user_id])
            ->get()->toArray();

        //print_r($pend_tasks);die;
        
        $status = array('success'=>200,'data'=>$tasks,
            'data_count'=>count($tasks),
            'comp_data_count'=>count($comp_tasks),
            'pend_data_count'=>count($pend_tasks)
        );
        return response()->json($status);
        
    }

    public function updateEmpTask(Request $request)
    {
        $data = $request->all();

        //print_r($data);die;
        $post = Tasks::find($data['id']);
        $post->status = $data['status'];

        if($post->save())
        {
            $status = array('success'=>200);
            return response()->json($status);
        }
    }
    
}