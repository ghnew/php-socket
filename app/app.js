const socket = io('ws://localhost:2021');

socket.on('new message', text => {
    const el = document.createElement('li');
    el.innerHTML = text;
    document.querySelector('ul').appendChild(el)
});

document.querySelector('button').onclick = () => {
    const message = document.querySelector('input').value;
    console.log(message);
    socket.emit('new message', message);
}