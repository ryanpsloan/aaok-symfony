<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $zipcode->getId() ?></td>
    </tr>
    <tr>
      <th>Zip code:</th>
      <td><?php echo $zipcode->getZipCode() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('zipcode/edit?id='.$zipcode->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('zipcode/index') ?>">List</a>
