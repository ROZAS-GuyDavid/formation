$('#formDeleteMultiple').on('submit', onDelete);
$('.btn-delete').on('click', onDelete);

function onDelete(evt) {
    if (confirm('Êtes vous sûr de vouloir supprimer définitivement ce(s) post(s) ?\nCette action est irréversible!')) {
        return true;
    } else {
        evt.preventDefault();
        return false;
    }
}