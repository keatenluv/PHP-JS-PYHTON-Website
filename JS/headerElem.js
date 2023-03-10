class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
      <style>
      .nav {
        height: 7.5vh;
        background-color: black;
      }
      .a {
        color: white;
        text-decoration: none;
      }
      .a:hover {
        color: green;
      }
      </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    

      <!--  Navigation  -->
      <nav class="navbar navbar-expand-lg nav">
        <div class="container-fluid">
          <a class="a mx-5" href="index.php">Home <?php //echo $_SESSION["userName"]; ?></a>
          <div class="justify-content-center" id="navbarNav">
              <a class="a" href="you-should-hire-me.php">Why you should hire me.</a>
            
          </div>
          <div class="justify-content-end">
              <a class="a mx-5" href="login.php">Logout</a>
          </div>
          
        </div>
      `;
    }
  }
  
  customElements.define('header-component', Header);