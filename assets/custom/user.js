
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
       url: "useradmin/getOrganization",
       dataType: "json"
       }).done(function(response){
         data.resolve(response);
     });
      return data.promise();
    },
  insertItem: function(item) {
        return $.ajax({
            type: "POST",
            url: "useradmin/addOrganization",
            data: item,
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "useradmin/editOrganization",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "useradmin/deleteOrganization",
            data: item
          });
        },
      },
    fields: [
     { name: "id", visible: false },
      { name: "nama", title: "Nama", type: "text", width: 100 },
      { name: "username", title: "Username", type: "text", width: 100 },
      { name: "tgl_lahir", title: "Tanggal lahir", type: "text", width: 100 },
      { name: "alamat", title: "Alamat", type: "text", width: 100 },
      { type: "control" }
    ]
  });  
});