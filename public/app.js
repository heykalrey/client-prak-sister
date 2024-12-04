// Fungsi untuk menampilkan modal tambah tugas
function showAddTask() {
  document.getElementById("addTaskModal").style.display = "flex";
}

// Fungsi untuk menutup modal tambah tugas
function closeAddTask() {
  document.getElementById("addTaskModal").style.display = "none";
}

// Fungsi untuk menampilkan modal edit tugas
function showEditTask(taskId) {
  // Mendapatkan data tugas berdasarkan taskId (misalnya dari database atau localStorage)
  // Isi data tugas ke form edit di modal
  document.getElementById("editTaskModal").style.display = "flex";
}

// Fungsi untuk menutup modal edit tugas
function closeEditTask() {
  document.getElementById("editTaskModal").style.display = "none";
}

// Fungsi untuk mencari tugas berdasarkan input pencarian
function searchTasks() {
  const searchTerm = document.getElementById("searchInput").value.toLowerCase();
  // Filter tugas berdasarkan pencarian (ini contoh, Anda bisa sesuaikan dengan data tugas Anda)
  const filteredTasks = tasks.filter((task) => task.title.toLowerCase().includes(searchTerm) || task.description.toLowerCase().includes(searchTerm));
  renderTasks(filteredTasks);
}

// Fungsi untuk menyimpan tugas baru
function saveTask() {
  const title = document.getElementById("taskTitle").value;
  const description = document.getElementById("taskDescription").value;
  const dueDate = document.getElementById("taskDueDate").value;
  const priority = document.getElementById("taskPriority").value;

  const newTask = {
    title,
    description,
    dueDate,
    priority,
  };

  // Simpan tugas baru (contoh, Anda bisa menggunakan localStorage atau API)
  tasks.push(newTask);

  closeAddTask(); // Tutup modal
  renderTasks(tasks); // Render ulang tugas
}

// Fungsi untuk mengupdate tugas
function updateTask() {
  const title = document.getElementById("editTaskTitle").value;
  const description = document.getElementById("editTaskDescription").value;
  const dueDate = document.getElementById("editTaskDueDate").value;
  const priority = document.getElementById("editTaskPriority").value;

  // Cari tugas yang akan diperbarui (sesuaikan dengan logika Anda)
  const taskIndex = tasks.findIndex((task) => task.id === editingTaskId); // Pastikan editingTaskId diatur sebelumnya

  // Update tugas
  tasks[taskIndex] = {
    ...tasks[taskIndex],
    title,
    description,
    dueDate,
    priority,
  };

  closeEditTask(); // Tutup modal
  renderTasks(tasks); // Render ulang tugas
}

// Fungsi untuk menampilkan daftar tugas
function renderTasks(tasks) {
  const taskContainer = document.getElementById("tasksContainer");
  taskContainer.innerHTML = ""; // Hapus daftar tugas yang lama

  tasks.forEach((task) => {
    const taskElement = document.createElement("div");
    taskElement.classList.add("task");
    taskElement.innerHTML = `
        <h4>${task.title}</h4>
        <p>${task.description}</p>
        <p class="due-date">${task.dueDate}</p>
        <p class="priority">${task.priority}</p>
        <button onclick="showEditTask(${task.id})">Edit</button>
      `;
    taskContainer.appendChild(taskElement);
  });
}

// Fungsi untuk logout
function logout() {
  // Anda bisa menggunakan localStorage atau sessionStorage untuk menyimpan status login
  localStorage.removeItem("userToken"); // Menghapus token login jika ada

  // Redirect ke halaman login atau halaman lain setelah logout
  alert("Anda telah logout!");
  window.location.href = "login.html"; // Ganti dengan halaman login Anda
}
