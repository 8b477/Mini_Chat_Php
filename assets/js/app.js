
//Affichage des message
function getMessage(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", 'handler.php');

    requeteAjax.onload = function (){
        const resultat = JSON.parse(requeteAjax.responseText);
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
    requeteAjax.send();
}


function postMessage(e){
    e.preventDefault();
    const author = document.querySelector('#author-id');
    const content = document.querySelector('#id-form-message');

    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);

    const requeteAjax =  new XMLHttpRequest();
    requeteAjax.open('POST', 'handler.php?task=write');

    requeteAjax.onload = function (){
        content.value = '';
        content.focus();
        getMessage();
    }
    requeteAjax.send(data);
}

document.querySelector('form').addEventListener('submit', postMessage);

const interval = window.setInterval(getMessage, 1500);

getMessage();