
//Affichage des message
function getMessage(){
    const requestAjax = new XMLHttpRequest();
    requestAjax.open("GET", './handler.php');

    requestAjax.onload = function (){
        const resultat = JSON.parse(requestAjax.responseText);
        const html = resultat.reverse().map(function(message){
            return`
            <div class="full-content">
                <span class="date">${message.created_at.substring(11, 16)}</span>
            <span class="author">${message.author} :</span>
            <div class="content">
            <br>
            <p class="content">${message.content}</p>
            </div>
            </div>
            `;
        }).join('');

        const messages = document.querySelector('.full-content');

        messages.innerHTML = html;
        messages.scrollTop = messages.scrollHeight;
    }
    requestAjax.send();
}


function postMessage(e){
    e.preventDefault();
    const author = document.querySelector('#author-id');
    const content = document.querySelector('#id-form-message');

    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);

    const requestAjax =  new XMLHttpRequest();
    requestAjax.open('POST', 'handler.php?task=write');

    requestAjax.onload = function (){
        content.value = '';
        content.focus();
        getMessage();
    }
    requestAjax.send(data);
}

document.querySelector('form').addEventListener('submit', postMessage);

//const interval = window.setInterval(getMessage, 1500);

getMessage();