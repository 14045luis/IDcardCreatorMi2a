$(function() {
  $.ajax({
    type: "GET",
    url: "/getAllPegawai/"
  }).done(function(countries) {
    countries.unshift({ id: "0", name: "" });

    $("#jsGrid").jsGrid({
      height: "300px",
      width: "100%",
      filtering: true,
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete client?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "getAllPegawai/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "addPegawai/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "updateuser/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "deletePegawai/",
            data: item
          });
        }
      },
      fields: [
        {
          name: "Nama",
          title: "nama",
          type: "text",
          width: 150
        },
        {
          name: "Username",
          title: "username",
          type: "text",
          width: 50
        },
        {
           name: "Tgl Lahir",
          title: "tgl_lahir",
          type: "text",
          width: 50
        },
        {
         name: "Alamat",
          title: "alamat",
          type: "text",
          width: 50
        },
        {
           name: "Foto",
          title: "gambar",
          type: "text",
          width: 50
        },
        { type: "control" }
      ]
    });
  });
});
