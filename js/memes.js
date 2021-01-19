(function (){
    const memesSe = document.querySelector('.meme');

    const vykresliMeme = async () => {
        const nazovSuboru = "memes.json";
        const fetchJ = await fetch(nazovSuboru);
        var memes = await fetchJ.json();
        const i = Math.floor(Math.random() * 18) + 1;
        const memeSe = document.createElement('memeblock')

        memeSe.innerHTML = `
        <img src="${memes[i].link}" width="500" style="margin-left: 30%; margin-top: 10px;">
    `;
        memesSe.appendChild(memeSe);
    };

    vykresliMeme();
}());
