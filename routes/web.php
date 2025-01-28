<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

class Task
{
    public function __construct(
        public int     $id,
        public string  $title,
        public string  $description,
        public ?string $long_description,
        public bool    $completed,
        public string  $created_at,
        public string  $updated_at
    )
    {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
//        'name' => 'Hint1k'
    ]); //shows 'index' page from resources/views
    //    return 'Main page';
    //    return view('welcome');
})->name('tasks.index');

Route::get('/{id}', function ($id) {
   return "One single task with id: " . $id;
})->name('tasks.show');

//Route::get('/hello/{name}', function ($name) {
//    return 'Hello ' . $name . '!';
//})->name('hello + name');
//
//Route::get('/hello', function () {
//    return 'Hello!';
//})->name('hello');
//
//Route::get('/hallo', function () { // misspelled hello
////    return redirect('/hello'); // without route names
//    return redirect()->route('hello'); //with route names
//})->name('misspelled hello');

Route::fallback(function () {
   return 'This is a fallback page';
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__ . '/auth.php';
