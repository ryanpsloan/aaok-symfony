<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $volunteer->getId() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $volunteer->getLastName() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $volunteer->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Address line:</th>
      <td><?php echo $volunteer->getAddressLine() ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $volunteer->getCityId() ?></td>
    </tr>
    <tr>
      <th>State:</th>
      <td><?php echo $volunteer->getStateId() ?></td>
    </tr>
    <tr>
      <th>Zipcode:</th>
      <td><?php echo $volunteer->getZipcodeId() ?></td>
    </tr>
    <tr>
      <th>Telephone home:</th>
      <td><?php echo $volunteer->getTelephoneHome() ?></td>
    </tr>
    <tr>
      <th>Telephone cell:</th>
      <td><?php echo $volunteer->getTelephoneCell() ?></td>
    </tr>
    <tr>
      <th>Telephone work:</th>
      <td><?php echo $volunteer->getTelephoneWork() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $volunteer->getEmail() ?></td>
    </tr>
    <tr>
      <th>Church:</th>
      <td><?php echo $volunteer->getChurch() ?></td>
    </tr>
    <tr>
      <th>City area:</th>
      <td><?php echo $volunteer->getCityArea() ?></td>
    </tr>
    <tr>
      <th>Service:</th>
      <td><?php echo $volunteer->getServiceId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('volunteer/edit?id='.$volunteer->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('volunteer/index') ?>">List</a>
