const clientSelector = document.querySelector('.first select');
const clientMessages = document.querySelector('#client_messages');

document.querySelector('.first').addEventListener('submit', (event) => {
  const prevMessages = Array.from(
    document.querySelectorAll('#client_messages > p')
  );
  prevMessages.forEach((message) => {
    message.remove();
  });

  if (localStorage.getItem(clientSelector.value)) {
    const localStorageData = localStorage
      .getItem(clientSelector.value)
      .split('|');

    localStorageData.forEach((message) => {
      const elem = document.createElement('p');
      elem.textContent = message;
      clientMessages.appendChild(elem);
    });

    clientMessages.style.display = 'block';
    event.preventDefault();
  }
});
