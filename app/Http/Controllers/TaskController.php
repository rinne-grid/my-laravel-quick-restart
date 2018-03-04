<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;

class TaskController extends Controller
{

    /**
     * @var TaskRepository
     */
    protected $tasks;

    // 依存注入（コンストラクタの引数）
    public function __construct(TaskRepository $tasks) {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        // コントローラに直接モデルを記述するパターン
        // $tasks = Task::where('user_id', $request->user()->id)->get();
        // 依存注入パターン
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * @param Request $request
     * @return Response 
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * @param Request $request
     * @param string $taskId
     * @return Response
     */
    // public function destroy(Request $request, $taskId) {
    // app/Providers/RouteServiceProviderのbootメソッドにRoute::model('task', 'App\Task')を追加したことによってインスタンスの注入ができた
    // ルート宣言に、{task}があれば、いつでも指定されたIDに対するTaskモデルを取得するように指示している。
    public function destroy(Request $request, Task $task) {
        // app/Providers/RouteServiceProvider.phpファイルのbootメソッドに
        // Route::model('task', 'App\Task');を書かない場合はtaskIdを元にTaskを取得する必要がある
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }
}
