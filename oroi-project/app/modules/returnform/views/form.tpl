<?php if (!empty($fields)): ?>
    <form method="post" action="handle/returnform">
        <input type="hidden" name="action" value="returnform" />
        <?php foreach($fields as $field): ?>
            <div class="row">
                <div class="form-group">
                    <?php if ($field['type'] == 'select'): ?>
                        <div class="col-sm-9 float-right">
                            <select name="<?php echo $field['name']; ?>" class="form-control">
                                <?php foreach ($field['options'] as $key => $option): ?>
                                    <option value="<?php echo $key; ?>"><?php echo $option; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-3 float-left">
                            <label for="<?php echo $field['name']; ?>" class="text-right"><?php echo $field['label']; ?></label>
                        </div>
                    <?php elseif ($field['type'] == 'checkbox'): ?>
                        <div class="col-sm-9 col-sm-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input id="<?php echo $field['id']; ?>" class="<?php echo (!empty($field['class']) ? $field['class'] : null); ?>" type="<?php echo $field['type']; ?>" name="<?php echo $field['name']; ?>" />
                                    <?php echo $field['label']; ?>
                                </label>
                            </div>
                        </div>
                    <?php elseif ($field['type'] == 'multyple_input'): ?>
                        <div class="col-sm-9 float-right">
                            <?php foreach ($field['options'] as $option): ?>
                                <input id="<?php echo $option['id']; ?>" class="form-control <?php echo (!empty($option['class']) ? $option['class'] : null); ?>" type="<?php echo $option['type']; ?>" name="<?php echo $option['name']; ?>" />
                            <?php endforeach; ?>
                        </div>
                        <div class="col-sm-3 float-left">
                            <label for="<?php echo $field['name']; ?>" class="text-right"><?php echo $field['label']; ?></label>
                        </div>
                    <?php elseif ($field['type'] == 'text'): ?>
                        <div class="col-sm-9 float-right">
                            <input id="<?php echo $field['id']; ?>" class="form-control <?php echo (!empty($field['class']) ? $field['class'] : null); ?>" type="<?php echo $field['type']; ?>" name="<?php echo $field['name']; ?>"<?php echo (!empty($field['placeholder']) ? ' placeholder="'.$field['placeholder'].'"' : null); ?> />
                        </div>
                        <div class="col-sm-3 float-left">
                            <label for="<?php echo $field['name']; ?>" class="text-right"><?php echo $field['label']; ?></label>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-default">Genereer ROI</button>
            </div>
        </div>
    </form>
<?php endif; ?>