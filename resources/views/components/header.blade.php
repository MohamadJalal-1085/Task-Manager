{{-- resources/views/components/header.blade.php --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container position-relative">
        
        <div class="d-flex">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('tasks.index') }}">All Tasks</a>
                    </li>
                </ul>
            </div>
        </div>

        <a class="navbar-brand position-absolute top-50 start-50 translate-middle" href="{{ route('tasks.index') }}">Task Manager</a>

    </div>
</nav>