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
      var profil = document.getElementById('logoProfil');
      var circle = document.querySelectorAll('#cercle');
      var logo = document.querySelectorAll('#logo');
      var taille = circle.length;
      var nbr_logo = logo.length;
      switch(mode){
        case "dark":
          rootStyle.style.setProperty('--bg-color', "#202124");
          rootStyle.style.setProperty('--primary-color', "#ffbb00");
          rootStyle.style.setProperty('--secondary-color', "#fedf87");
          rootStyle.style.setProperty('--font-color', "white");
          rootStyle.style.setProperty('--font-color-invert', "black");
          rootStyle.style.setProperty('--bg-color-light', "#34363b");
          rootStyle.style.setProperty('--bg-color-dark', "white");
          for(i=0; i < nbr_logo; i++){
            logo[i].src = "img/logo_blanc.png";
          }
          if(profil !== null){
            profil.src = "img/profil_blanc.png";
          }
          for(i=0; i < taille; i++){
            circle[i].src= "img/intervenants/cercles2.png";
          }
        break;
        case "light":
          rootStyle.style.setProperty('--bg-color', "white");
          rootStyle.style.setProperty('--primary-color', "#fedf87");
          rootStyle.style.setProperty('--secondary-color', "#ffbb00");
          rootStyle.style.setProperty('--font-color', "black");
          rootStyle.style.setProperty('--font-color-invert', "white");
          rootStyle.style.setProperty('--bg-color-light', "#f5f5f5");
          rootStyle.style.setProperty('--bg-color-dark', "#202124");
          for(i=0; i < nbr_logo; i++){
            logo[i].src = "img/logo_hangart.png";
          }
          if(profil !== null){
            profil.src = "img/profil.png";
          }
          for(i=0; i < taille; i++){
            circle[i].src= "img/intervenants/cercles.png";
          }
        break;
      }
    }
