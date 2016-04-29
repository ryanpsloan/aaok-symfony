<h1>Zipcode List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Zip code</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($zipcode_list as $zipcode): ?>
    <tr>
      <td><a href="<?php echo url_for('zipcode/show?id='.$zipcode->getId()) ?>"><?php echo $zipcode->getId() ?></a></td>
      <td><?php echo $zipcode->getZipCode() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('zipcode/new') ?>">New</a>
