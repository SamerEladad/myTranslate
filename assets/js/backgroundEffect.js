// Background Effects
document.addEventListener('DOMContentLoaded', function () {
  // Words to display on the background
    const words = ['Hello', 'Hola', '你好', 'Bonjour', '안녕하세요', 'Hallo', 'Ciao', 'こんにちは', 'Привет', 'مرحبا', "Oi"];
    const body = document.querySelector('body');
  
    // Create 20 words
    // Each word has a random position, size, opacity, and animation duration
    // The animation duration is between 10 and 20 seconds
    // The animation is linear
    // The animation is infinite
    // The animation moves the word from the top of the screen to the bottom
    for (let i = 0; i < 20; i++) {
      // Create a span element
      const word = document.createElement('span');
      // Set the text of the span element to a random word (from the words array)
      word.innerText = words[Math.floor(Math.random() * words.length)];
      // Set the position, size, opacity, and animation of the span element
      word.style.position = 'absolute';
      word.style.fontSize = `${12 + Math.random() * 24}px`;
      word.style.opacity = Math.random() * 0.5 + 0.1;
      word.style.color = '#ffffff';
      word.style.top = `${Math.random() * 100}vh`;
      word.style.left = `${Math.random() * 100}vw`;
      word.style.animation = `moveWord ${10 + Math.random() * 10}s linear infinite`;
  
      // Append the span element to the body
      body.appendChild(word);
    }
  });
