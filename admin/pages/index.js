  var config = {
        apiKey: "AIzaSyBLI4dpxdTTtloy75bibxZIplHwfcECOFc",
        authDomain: "silau-d0db9.firebaseapp.com",
        databaseURL: "https://silau-d0db9.firebaseio.com",
        storageBucket: "silau-d0db9.appspot.com",
        messagingSenderId: "379249192991"
      };
      firebase.initializeApp(config);
      const plist = document.getElementById('list');
      var dbRef = firebase.database().ref().child('silau3');
      dbRef.on('child_added',snap => {
        //const p = document.createElement('p');
        //p.innerText = snap.val();
        var dbParam = snap.val();
        //plist.appendChild(p);
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
          };
        xhttp.open("GET", "admin/Model.php?cucianid=" + dbParam, true);
          xhttp.send();
        //window.location.href = 'kirim.php?id=' + dbParam;
      });

      dbRef.on('child_changed',snap => {
        const pchanged = document.getElementById(snap.key);
        pchanged.innerText=snap.val();
      });

      dbRef.on('child_removed',snap => {
        const premove = document.getElementById(snap.key);
        premove.remove();
      });