<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $service->getId() ?></td>
    </tr>
    <tr>
      <th>Service name:</th>
      <td><?php echo $service->getServiceName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('service/edit?id='.$service->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('service/index') ?>">List</a>
