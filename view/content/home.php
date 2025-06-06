<main class="configure__container">
    <section>
        <h2>All Pizzas</h2>
        <ul class="pizza__list">
            <?php
            // show the pizzas
            foreach ($pizzas as $pizza) {
                echo '<li class="pizza__item">';
                echo '<img class="item__image" src="./assets/' . $pizza['image'] . '" alt="' . $pizza['name'] . '">';
                echo '<h3>' . $pizza['name'] . '</h3>';
                echo '<p>' . $pizza['description'] . '</p>';
                echo '<p>' . $pizza['price'] . '$</p>';
                echo '<p class="configure-actions">';
                echo '<a href="index.php" class="pizza-action">Edit</a>';
                echo '<a href="index.php" class="pizza-action">Delete</a>';
                echo '</p>';
                echo '</li>';
            }
            ?>
    </section>
    <section>
        <h2>Add Pizza</h2>
        <?php
        // show the errors
        if (!empty($errors)) {
            var_dump($errors);
        }
        ?>
        <form method="post" action="index.php?page=home" class="pizza__form">
            <input type="hidden" name="action" value="add_pizza" class="form--add">
            <div class="form__field">
                <label>Name
                    <!-- DON't FORGET TO ADD CLASS="input" -->
                    <input type="text" class="input" name="name" required placeholder="Pizza name" size="50">
                    <span class="error"><?php if (!empty($errors['text'])) {
                        echo $errors['text'];
                    } ?></span>
                </label>
            </div>
            <div class="form__field">
                <label>Price
                    <input type="number" class="input" min="0" max="100" name="price" required size="5" value="77">
                    <!-- ERROR INFO -->
                    <span class="error"><?php if (!empty($errors['text'])) {
                        echo $errors['text'];
                    } ?></span>
                </label>
            </div>
            <div class="formd__field">
                <label> Description
                    <textarea name="description" required class="input" id="description" cols="30" rows="10"
                        placeholder="This is the best pizza ever."></textarea>
                    <!-- ERROR INFO -->
                    <span class="error"><?php if (!empty($errors['text'])) {
                        echo $errors['text'];
                    } ?></span>
                </label>
            </div>
            <div class="form__field">
                <label>Image
                    <input type="text" class="input" name="image" required placeholder="pizza.png" size="50"
                        value="pizza.png">
                    <!-- ERROR INFO -->
                    <span class="error"><?php if (!empty($errors['text'])) {
                        echo $errors['text'];
                    } ?></span>
                </label>
            </div>
            <div class="form__field">
                <button type="submit">Add</button>
            </div>
        </form>
    </section>