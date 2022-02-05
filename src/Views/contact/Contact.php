<main class="main-container">
    <h1>Contact <?php echo $data['username'] ?? ''; ?></h1>
    <form action="/contact" method="post">
        <label for="name">Name</label>
        <input name="name" type="text">
        <label for="message">Message</label>
        <input name="message" type="text">
        <input type="submit" value="submit">
    </form>
</main>