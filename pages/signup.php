<h2>Sign up</h2>
<form action="actions/signup_action.php" method="post">
    <label>Full name</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Phone</label>
    <input type="text" name="phone">

    <label>Password</label>
    <input type="password" name="password" required>

    <label>Address</label>
    <textarea name="address"></textarea>

    <button type="submit">Create account</button>
</form>
