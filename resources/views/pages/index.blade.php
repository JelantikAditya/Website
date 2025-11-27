<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('layout.navbar')

    <section id="about" class="min-h-screen flex flex-col items-center justify-center text-center px-6 
    bg-gradient-to-b from-slate-800 to-slate-900">
    <h2 class="text-4xl font-bold text-indigo-400 mb-4">About Me</h2>
    <p class="max-w-2xl text-lg text-gray-300 leading-relaxed">
      Hello! I'm <span class="text-indigo-400 font-semibold">
        <a href="https://www.instagram.com/jelantik.aditya/">JelantikAditya</a>
      </span>, Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, magni vero tempore sed ut alias recusandae quisquam mollitia explicabo esse quasi provident suscipit, voluptatem delectus obcaecati, molestias et a quia? 
    </p>
  </section>

  <section id="experience" class="min-h-screen flex flex-col items-center justify-center px-6 py-20 
    bg-gradient-to-b from-slate-900 to-slate-800">
    <h2 class="text-4xl font-bold text-indigo-400 mb-8">Experience</h2>
    <div class="max-w-3xl space-y-6">
      <div class="bg-slate-800/70 p-6 rounded-xl shadow-md hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-white">Frontend Developer - Freelance</h3>
        <p class="text-gray-400 text-sm mb-2">2023 - Present</p>
        <p>Building responsive and modern websites for clients using HTML, Tailwind CSS, and JavaScript frameworks.</p>
      </div>
      <div class="bg-slate-800/70 p-6 rounded-xl shadow-md hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-white">UI/UX Designer - College Project</h3>
        <p class="text-gray-400 text-sm mb-2">2022 - 2023</p>
        <p>Designed and prototyped mobile applications with focus on accessibility and user-centered design principles.</p>
      </div>
    </div>
  </section>

  <section id="projects" class="min-h-screen flex flex-col items-center justify-center px-6 py-20 
    bg-gradient-to-b from-slate-800 to-slate-900">
    <h2 class="text-4xl font-bold text-indigo-400 mb-8">Projects</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl">
      <div class="bg-slate-800/70 p-5 rounded-xl shadow-md hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-white mb-2">Portfolio Website</h3>
        <p class="text-gray-400">A sleek, dark-themed personal portfolio built using Tailwind CSS and smooth transitions.</p>
      </div>
      <div class="bg-slate-800/70 p-5 rounded-xl shadow-md hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-white mb-2">E-Commerce UI</h3>
        <p class="text-gray-400">Designed and developed an interactive online store layout with product filtering features.</p>
      </div>
      <div class="bg-slate-800/70 p-5 rounded-xl shadow-md hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-white mb-2">Task Manager App</h3>
        <p class="text-gray-400">A simple web app for managing daily tasks using vanilla JS and local storage.</p>
      </div>
    </div>
  </section>

  @include('layout.footer') 

</body>
</html>