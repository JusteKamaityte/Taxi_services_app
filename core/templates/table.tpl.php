<table>
    <thead>
    <?php foreach ($data['thead'] ?? [] as $thead => $thead_value): ?>
        <th <?php print html_attr($thead['attr'] ?? []); ?>>
            <?php print $thead; ?>
        </th>
    <?php endforeach; ?>
    </thead>
    <tbody>
    <?php foreach ($data['tbody'] ?? [] as $trow): ?>
        <tr>
            <?php foreach ($trow ?? [] as $row_data) : ?>
               <td> <?php print $row_data; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


