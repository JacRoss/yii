$('#search').select2({
    placeholder: 'Поиск',
    width: '100%',
    ajax: {
        url: yiiOptions.url + '/index.php?r=article/search',
        dataType: 'json',
        delay: 250,
        data: (params) => {
            return {query: params.term};
        },
        processResults: (data) => {
            return {results: data.data};
        },
        cache: true
    },
    minimumInputLength: 3,
    templateResult: (data) => data.title,
    templateSelection: selection
});

function selection(data) {
    if (data.id) {
        window.location = yiiOptions.url + '/index.php?r=article/show-by-id&id=' + data.id;
    }
}