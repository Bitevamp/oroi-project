<?php if (!empty($fields)): ?>
    <form method="post" action="handler.php">
        <input type="hidden" name="action" value="secondreturnform" />
        <?php foreach($fields as $field): ?>
            <div class="form-group">
                <input id="<?php echo $field['id']; ?>"<?php echo (!empty($field['class']) ? ' class="'.$field['class'].'"' : null); ?> type="<?php echo $field['type']; ?>" name="<?php echo $field['name']; ?>"<?php echo (!empty($field['placeholder']) ? ' placeholder="'.$field['placeholder'].'"' : null); ?> />
                <label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
            </div>
        <?php endforeach; ?>
        <div class="form-group">
            <input type="submit" value="bereken" class="submit" />
        </div>
    </form>
<?php endif; ?>