import Noty from 'noty';
let lang = {
    saved: {
        type: 'success',
        text: 'Salvato con successo!',
    },
    errpswupdate: {
        type: 'error',
        text: 'Password attuale non corretta!',
    },
    pswupdated: {
        type: 'success',
        text: 'Password aggiornata con successo!',
    },
    updated: {
        type: 'success',
        text: 'Aggiornato con successo!',
    },
    deleted: {
        type: 'success',
        text: 'Eliminato con successo!',
    },
    error: {
        type: 'error',
        text: "C'è stato un errore con il completamento dell'azione appena effettuata:",
    },
    auth: {
        type: 'error',
        text: "Non disponete dei permessi per procedere con questa azione.",
    },
}
Noty.overrideDefaults({
    timeout: 5000,
    theme: 'bootstrap-v4',
    closeWith: ['click'],
});
window.notify = function (args) {
    //Se il parametro n è = ad argomento in lang, ritorna il testo.
    if (args.parametro) {
        args.text = lang[args.parametro].text;
        args.type = lang[args.parametro].type;
    }
    /*
    ** Error data
    ** Uso: notify({error: errorobject})
    */
    if(args.error){
        let error_msg = `<br>
        <small class="error-noty">
            ${args.error}<br>
            ${args.error.response.data.message}<br>
            ${args.error.response.data.file.split('/').reverse()[0]}:${args.error.response.data.line}
        </small>
        `
        args.type = lang['error'].type;
        args.text = lang['error'].text+error_msg;
    }
    /*
    ** Generic data
    ** Uso: notify({parameter: 'updated', data: 'Testo a scelta'})
    */
    if(args.data){
        args.text = lang[args.parametro].text+`<br><small>${args.data}</small>`;
    }
    new Noty(args).show();
}