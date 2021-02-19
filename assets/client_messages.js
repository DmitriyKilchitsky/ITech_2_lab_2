const clientName = document.querySelector('#client_name').textContent;

if (!localStorage.getItem(clientName)) {
  const messages = Array.from(document.querySelectorAll('p'));

  const localStorageValue = messages.reduce((accumulator, message) => {
    return accumulator + message.textContent + '|';
  }, '');
  
  localStorage.setItem(clientName, localStorageValue.slice(0, -1));
}
