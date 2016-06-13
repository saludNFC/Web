$(document).ready(function(){
    $('#searchbox').selectize({
        valueField: 'url',
        // labelField: 'name',
        labelField: 'apellido',
        // searchField: ['name'],
        searchField: ['apellido'],
        maxOptions: 10,
        options: [],
        create: false,
        render: {
            option: function(item, escape) {
                // return '<div><img src="'+ item.icon +'">' +escape(item.name)+'</div>';
                return '<div>' + escape(item.apellido) + " " + escape(item.nombre) + '</div>';
            }
        },
        optgroups: [
            // {value: 'product', label: 'Products'},
            {value: 'patients', label: 'Pacientes'}
        ],
        optgroupField: 'class',
        // optgroupOrder: ['product','category'],
        optgroupOrder: ['patients'],
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+'/api/search',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });
});
