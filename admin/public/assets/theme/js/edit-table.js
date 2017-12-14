$('#user-table').Tabledit({
    url: 'example.php', //Nơi xử lí dữ liệu
    rowIdentifier: 'data-id',
    deleteButton: false,
    editButton: false,
    restoreButton: false,
    columns: {
        identifier: [0, 'id'],
        editable: [[4, 'lastname']]
    }
});