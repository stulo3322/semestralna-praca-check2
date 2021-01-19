(function () {
    const vtipySe = document.querySelector('.vtipy');
    const load = document.querySelector('.load');

    const getVtipy = async () => {
        const api = 'https://official-joke-api.appspot.com/jokes/programming/ten';
        const odpoved = await fetch(api);
        if(!odpoved.ok) {
            throw new Error(`Vyskytla sa chyba: ${odpoved.status}`);
        }
        var res = await odpoved.json();

        return res;
    };

    const vypisVtipy = (vtipy) => {

        vtipy.forEach(vtip => {
            const vtipSe = document.createElement('blokvtip');
            vtipSe.classList.add('vtip');

            vtipSe.innerHTML = `
            <hr>
            <span class="zvyraznenie">${vtip.setup}</span>
            ${vtip.punchline}
            <hr>

        `;
            vtipySe.appendChild(vtipSe);
        });
    };

    const nacitajVtipy = async () => {
        zobrazNacitavanie();
        setTimeout(async () => {
            try {
                const odpoved = await getVtipy();
                vypisVtipy(odpoved);
            }
            catch (error) {
                console.log(error.message);
            } finally {
                skryNacitavanie();
            }
        },500);
    };

    const skryNacitavanie = () => {
        load.classList.remove('show');
    };

    const zobrazNacitavanie = () => {
        load.classList.add('show');
    };

    window.addEventListener('scroll',() => {
        const {
            scrollTop,
            scrollHeight,
            clientHeight
        } = document.documentElement;

        if (scrollTop + clientHeight >= scrollHeight - 1 ) {
            nacitajVtipy();
        }
    },{
        passive: true
    });
    nacitajVtipy();
})();
