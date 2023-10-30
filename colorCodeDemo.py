## In this we'll showcase a demonstration of how sorting tasks by color could ideally function.

# Here is a placeholder template for a task.
class Task:

    def __init__(self, title, description, color):
        self.title = title
        self.description = description
        self.color = color

task1 = Task("Task1", "Do stuff", "Red")
task2 = Task("Task2", "", "Orange")
task3 = Task("Task3", "", "Yellow")

#Collection of all tasks the user has created, in an unsorted order.
task_list = [task2, task3, task1]

color_values = {
    "Red": 6,
    "Orange": 5,
    "Purple": 4,
    "Yellow": 3,
    "Blue": 2,
    "Green": 1,
    "Grey": 0
}

# Sort tasks by the color hierarchy in the above dictionary.
color_sorted_tasks = sorted(task_list, key=lambda task: color_values[task.color], reverse=True)

# The output should now show all of the tasks prioritized by color
for t in color_sorted_tasks:
    print(t.title + " " + t.color)

