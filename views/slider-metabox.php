<?php
    $meta = get_post_meta( $post->ID );
    $link_text = get_post_meta( $post->ID, 'slider_link_text', true );
    $link_url = get_post_meta( $post->ID, 'slider_link_url', true );
?>
<input type="hidden" name="slider_nonce" value="<?php echo wp_create_nonce( 'slider_nonce' ); ?>">
<table class="form-table slider-metabox">
    <tr>
        <th>
            <label for="slider_link_text">Link Text</label>
        </th>
        <td>
            <input type="text" name="slider_link_text" id="slider_link_text" class="regular-text link-text" value="<?php echo ( isset( $link_text ) ) ? esc_html( $link_text ) : ''; ?>" required>
        </td>
    </tr>
    <tr>
        <th>
            <label for="slider_link_url">Link URL</label>
        </th>
        <td>
            <input type="url" name="slider_link_url" id="slider_link_url" class="regular-text link-url" value="<?php echo ( isset( $link_url ) ) ? esc_url( $link_url ) : ''; ?>" required>
        </td>
    </tr>
</table>