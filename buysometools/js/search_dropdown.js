$('#searchResults').hide();
    $('#searchbar').focusout(function()
    {
      $('#searchResults').hide();
    });

    $('#searchbar').keyup(function()
    {
      if ($('#searchbar').val().length > 2)
      {
        $.ajax(
          {
            type: "POST",
            url: "../hi/ajaxsearch.php",
            data: ({searchTerm:$('#searchbar').val()}),
            success: function(html)
            {
              if (html)
              {
                $('#searchResults').html(html);

              }
              else
              $('#searchResults').html("No matching Products");
            $('#searchResults').show();
          }
          }
        );
      }
      else
      {
        $('#searchResults').hide();
      }
    });




/*
$('#searchbar').keyup(function()
  {
    if ($('#searchbar').val().length > 2)
    {
      $.ajax(
        {
          type: "POST",
          url: "../hi/ajaxsearch.php",
          data: ({searchTerm:$('#searchbar').val()}),
          success: function(html)
          {

            if (html)
            {

            //	$('#searchbar').html(function()//;
              {$(this.target).find('#searchbar').autocomplete()
              ;
            };
            }
            //else
              //$('#searchbar').html("No matching Products");
            //$('#searchResults').show();

        }
        }
      );
    }
    else
    {
      //$('#searchResults').hide();
    }
  });
  */
