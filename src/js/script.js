let add_event_btn = document.getElementById('add_event_btn');
let pop_events = document.getElementById('pop-up-add_events');
let img_close = document.getElementById("img_close");
add_event_btn.addEventListener('click' , () => {
    pop_events.style.display = 'flex';
});
img_close.addEventListener('click' , () => {
    pop_events.style.display = 'none';
});
