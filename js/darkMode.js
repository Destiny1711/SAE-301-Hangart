var checkbox = document.querySelector("input[name=darkMode]");

    checkbox.addEventListener('change', function() {
      if (this.checked) {
        setMode('dark');
      } else {
        setMode('light');
      }
    });
    function setMode(mode) {
      var rootStyle = document.querySelector(':root');
      var logo = document.getElementById('logo');
      var profil = document.getElementById('logoProfil');
      switch(mode){

        case "dark":
          rootStyle.style.setProperty('--bg-color', "#202124");
          rootStyle.style.setProperty('--primary-color', "#ffbb00");
          rootStyle.style.setProperty('--secondary-color', "#fedf87");
          rootStyle.style.setProperty('--font-color', "white");
          rootStyle.style.setProperty('--font-color-invert', "black");
          rootStyle.style.setProperty('--bg-color-light', "#34363b");
          logo.src = "img/logo_blanc.png";
          profil.src = "img/profil_blanc.png";
          
        break;
        case "light":
          rootStyle.style.setProperty('--bg-color', "white");
          rootStyle.style.setProperty('--primary-color', "#fedf87");
          rootStyle.style.setProperty('--secondary-color', "#ffbb00");
          rootStyle.style.setProperty('--font-color', "black");
          rootStyle.style.setProperty('--font-color-invert', "white");
          rootStyle.style.setProperty('--bg-color-light', "#f5f5f5");
          logo.src = "img/logo_hangart.png";
          profil.src = "img/profil.png";
        break;
      }
    }