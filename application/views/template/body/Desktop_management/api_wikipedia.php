<html>
<head>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>

   <script>
      $(document).ready(function(){


        let searchString = "apple"

        let url = 'https://en.wikipedia.org/w/api.php? format=json&action=query&generator=search&gsrnamespace=0&gsrsearch=' + searchString + '&gsrlimit=10&prop=extracts&exintro&explaintext&exsentences=1&exlimit=max&origin=*'

        var xhr = new XMLHttpRequest()
        xhr.open('GET', url, true)

        xhr.onload = function() {
          if (xhr.status >= 200 && xhr.status < 400) {
            var data = JSON.parse(xhr.responseText)
            console.log('data returned:', data.query.pages)
          } else {
            console.log('connected to wikipedia, but error')
          }
        }

        xhr.onerror = function() {
          console.log('cannot connect to wikipedia')
        }

        xhr.send()


      });
   </script>
</head>
</html>