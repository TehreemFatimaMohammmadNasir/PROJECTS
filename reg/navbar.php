<style>
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  background-color: #333;
  color: #fff;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.toggle-button {
  position: absolute;
  top: 20px;
  left: 20px;
  background-color: transparent;
  border: none;
  cursor: pointer;
  z-index: 2;
}

.bar {
  display: block;
  width: 25px;
  height: 3px;
  background-color: #fff;
  margin-bottom: 5px;
}

.navbar-links {
  position: absolute;
  top: 0;
  left: -200px;
  width: 200px;
  height: 100vh;
  background-color: #333;
  color: #fff;
  padding: 20px;
  transition: left 0.5s ease;
}

#toggle:checked ~ .navbar-links {
  left: 0;
}

.navbar-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.navbar-links li {
  margin-bottom: 20px;
}

.navbar-links a {
  color: #fff;
  text-decoration: none;
}

</style>
<div class="navbar">
  <input type="checkbox" id="toggle">
  <label for="toggle" class="toggle-button">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </label>
  <div class="navbar-links">
    <ul>
      <li><a href="signup.php">Home</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="logout.php">Logout</a></li>
      <li><a href="signup.php">signup</a></li>
     
    </ul>
  </div>
</div>