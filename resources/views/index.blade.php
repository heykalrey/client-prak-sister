<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-Do List</title>
    <link rel="stylesheet" href="{{ asset('style 1.css') }}" />
</head>

<body>
    <div id="app-container">

        <!-- Header -->
        <header>
            <h1>To-Do List</h1>
            <button id="addTaskBtn" onclick="showAddTask()">Tambah Tugas</button>
            <input type="text" id="searchInput" placeholder="Cari tugas..." oninput="searchTasks()" />
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" id="logoutBtn">Logout</button>
            </form>
        </header>

        <!-- Filter Section -->
        <div id="filters">
            <label for="priorityFilter">Prioritas:</label>
            <select id="priorityFilter" onchange="filterTasks()">
                <option value="all">Semua</option>
                <option value="high">Tinggi</option>
                <option value="medium">Sedang</option>
                <option value="low">Rendah</option>
            </select>

            <label for="statusFilter">Status:</label>
            <select id="statusFilter" onchange="filterTasks()">
                <option value="all">Semua</option>
                <option value="in-progress">Sedang Dikerjakan</option>
                <option value="completed">Selesai</option>
            </select>

            <label for="tagFilter">Tag:</label>
            <select id="tagFilter" onchange="filterTasks()">
                <option value="all">Semua</option>
            </select>
        </div>

        <!-- Task List Container -->
        <div id="tasksContainer">
            <!-- Daftar tugas akan muncul di sini -->
        </div>

        <!-- Modal Tambah Tugas -->
        <div id="addTaskModal" class="modal" style="display: none">
            <div class="modal-content">
                <h3>Tambah Tugas</h3>
                <input type="text" id="taskTitle" placeholder="Judul Tugas" required />
                <textarea id="taskDescription" placeholder="Deskripsi Tugas" required></textarea>
                <input type="date" id="taskDueDate" />
                <select id="taskPriority">
                    <option value="high">Tinggi</option>
                    <option value="medium">Sedang</option>
                    <option value="low">Rendah</option>
                </select>
                <div id="taskTagsContainer"></div>
                <button class="save-btn" onclick="saveTask()">Simpan</button>
                <button class="cancel-btn" onclick="closeAddTask()">Batal</button>
            </div>
        </div>

        <!-- Modal Edit Tugas -->
        <div id="editTaskModal" class="modal" style="display: none">
            <div class="modal-content">
                <h3>Edit Tugas</h3>
                <input type="text" id="editTaskTitle" placeholder="Judul Tugas" required />
                <textarea id="editTaskDescription" placeholder="Deskripsi Tugas" required></textarea>
                <input type="date" id="editTaskDueDate" />
                <select id="editTaskPriority">
                    <option value="high">Tinggi</option>
                    <option value="medium">Sedang</option>
                    <option value="low">Rendah</option>
                </select>
                <div id="editTaskTagsContainer"></div>
                <button class="save-btn" onclick="updateTask()">Update</button>
                <button class="cancel-btn" onclick="closeEditTask()">Batal</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('app.js') }}"></script>
</body>

</html>
