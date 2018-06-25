
$(function() {
  $("#grid").jsGrid({
    width: "100%",
    height: "400px",
    filtering: false,
      inserting: false,
      editing: false,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete client?",
    controller: {
    loadData: function (filter) {
     var data = $.Deferred();
     return $.ajax({
       type: "GET",
       url: "orgadmin/getOrganization",
       dataType: "json"
       }).done(function(response){
         data.resolve(response);
     });
      return data.promise();
    },
  insertItem: function(item) {
        return $.ajax({
            type: "POST",
            url: "orgadmin/addOrganization",
            data: item,
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "orgadmin/editOrganization",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "orgadmin/deleteOrganization",
            data: item
          });
        },
      },
    fields: [
      { name: "nm", title: "Nama", type: "text", width: 100 },
      { name: "id_organisasi", visible: false },
      { name: "kode", type: "readonly",  width: 30 },
      { name: "mm", title: "Desain", type: "readonly" },
      { type: "control" }
    ]
  });  
});