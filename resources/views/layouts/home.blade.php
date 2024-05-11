<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TomaTODO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css"/>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2> Tasks </h2>
            <div id="task-list">
                <div id="task-0" class="task">
                    Clique em + para adicionar uma task!
                </div>
            </div>
        </div>
        <div class="content">
            <nav>
                <h1>TomaTODO 🍅</h1>
            </nav>

            <div id="todo-container">
                <div id="add-task" onclick="openAddTaskModal()">+</div>
                <div id="timer-btn" onclick="openTimer()">🍅</div>
                <div id="timer-modal">
                    <div id="timer-header">
                        <div id="timer">25:00</div>
                        <button id="close-timer" onclick="closeTimer()">x</button>
                    </div>


                    <div id="timer-controls">
                        <button id="play-pause" class="play" onclick="toggleTimer()"></button>
                        <button id="break" class="break" onclick="startBreak()"></button>
                        <button id="restart" class="restart" onclick="restartTimer()"></button>
                    </div>

                </div>

                <div id="add-task-modal">
                    <div id="add-task-header">
                        <div id="new-task-header">New task</div>
                        <button id="close-add-task" onclick="closeAddTaskModal()">x</button>

                    </div>
                    <form id="add-task-form">
                        <label for="task-title">Title:</label>
                        <input type="text" id="task-title" name="task-title" required>

                        <label for="task-deadline">Deadline:</label>
                        <input type="datetime-local" id="task-deadline" name="task-deadline" required>

                        <button type="button" onclick="addTask()">Add task</button>

                    </form>
                </div>

            </div>




        </div>


    </div>



  <script>
    let timerRunning = false;
    let timerInterval;
    let timerMinutes = 25;
    let timerSeconds = 0;

    let taskId = 0; // Variável para atribuir IDs únicos a cada task
    function addTask() {
      // Implementar lógica para adicionar uma nova task
      const taskContainer = document.getElementById('task-list');

      // Criar elementos da task
      const task = document.createElement('div');
      task.className = 'task';
      task.id = `task-${taskId++}`; // Atribuir ID único
      task.addEventListener('click', openAddTaskModal);

      // Adicionar título e prazo à task (substitua com os dados reais)
      const title = 'Nova Task';
      const deadline = '01/01/2024 12:00';

      // Adicionar task à caixa
      taskContainer.insertBefore(task, document.getElementById('task'));

    }

    function openTimer() {
      document.getElementById('timer-modal').style.display = 'block';
      updateTimerDisplay();
    }

    function closeTimer() {
      document.getElementById('timer-modal').style.display = 'none';
      clearInterval(timerInterval);
      resetTimer();
    }

    function toggleTimer() {
      timerRunning = !timerRunning;

      if (timerRunning) {
        timerInterval = setInterval(updateTimer, 1000);
        document.getElementById('play-pause').className = 'pause';
      } else {
        clearInterval(timerInterval);
        document.getElementById('play-pause').className = 'play';
      }
    }

    function startBreak() {
      timerMinutes = 5;
      timerSeconds = 0;
      updateTimerDisplay();
      toggleTimer(); // Inicia o timer
    }

    function restartTimer() {
      timerMinutes = 25;
      timerSeconds = 0;
      updateTimerDisplay();
      toggleTimer(); // Inicia o timer
    }

    function resetTimer() {
      timerRunning = false;
      timerMinutes = 25;
      timerSeconds = 0;
      updateTimerDisplay();
    }

    function updateTimer() {
      if (timerMinutes === 0 && timerSeconds === 0) {
        // Timer chegou a zero
        clearInterval(timerInterval);
        resetTimer();
      } else {
        if (timerSeconds === 0) {
          timerMinutes--;
          timerSeconds = 59;
        } else {
          timerSeconds--;
        }
      }

      updateTimerDisplay();
    }

    function updateTimerDisplay() {
      const timerDisplay = document.getElementById('timer');
      const displayMinutes = timerMinutes < 10 ? `0${timerMinutes}` : timerMinutes;
      const displaySeconds = timerSeconds < 10 ? `0${timerSeconds}` : timerSeconds;
      timerDisplay.textContent = `${displayMinutes}:${displaySeconds}`;
    }

    function openAddTaskModal() {
        document.getElementById('add-task-modal').style.display = 'block';
    }

    function closeAddTaskModal() {
        document.getElementById('add-task-modal').style.display = 'none';
    }
  </script>

</body>
</html>
