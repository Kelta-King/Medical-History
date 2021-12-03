import tkinter as tk

window = tk.Tk()

data = tk.Label(
    text="Hello, Tkinter",
    fg="white",
    bg="black",
    width=10,
    height=10
)
button = tk.Button(
    text="Click me!",
    width=25,
    height=5,
    bg="blue",
    fg="yellow",
)
text_box = tk.Text()
entry = tk.Entry(fg="yellow", bg="blue", width=50)
entry.insert(0, "Hello world")
entry.insert(5, "Hello world")
text_box.pack()

data.pack()
button.pack()
entry.pack()

window.mainloop()