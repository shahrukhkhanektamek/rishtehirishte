<table width="100%" cellpadding="0" cellspacing="0" border="0"
    style="background:#ffffff;padding:20px 0;font-family: Arial, Helvetica, sans-serif;">
    <tr>
        <td align="center">

            <!-- container -->
            <table cellpadding="0" cellspacing="0" border="0"
                style="width:80%;background:#ffffff;border:1px solid #e5e5e5;border-radius:12px;">
                <tr>
                    <td style="padding:12px;">

                        <!-- two column layout -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr valign="top">

                                <!-- LEFT CARD -->
                                <td width="100%" style="padding-right:18px;">

                                    <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                        style="background:#f9f9f9;border-radius:12px;padding:15px;">

                                        <tr>
                                            <td>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                    style="background:#f9f9f9;border-radius:12px;padding:15px;">
                                                    <tr>
                                                        <td align="center"
                                                            style="padding-bottom:10px;padding-top: 10px;">
                                                            <img src="<?= image_check($row->images) ?>" width="120"
                                                                height="120" alt="avatar"
                                                                style="border-radius:12px;object-fit:cover;border:2px solid #C9302C;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                    style="background:#f9f9f9;border-radius:12px;padding:15px;">

                                                    <tr>
                                                        <td
                                                            style="font-size:20px;font-weight:700;color:#222222;padding-bottom:8px;">
                                                            <?= esc($row->name) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#555555;line-height:1.4;padding-bottom:14px;">
                                                            <?= (($row->aboutfamily)) ?>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>
                                <!-- RIGHT DETAILS -->
                                <td width="100%" style="padding-left:6px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">

                                        <!-- Family Detail -->
                                        <tr>
                                            <td
                                                style="font-size:20px;font-weight:700;color:#C9302C;padding-bottom:10px;">
                                                Family</td>
                                        </tr>

                                        <tr>
                                            <td style="font-size:13px;color:#333333;line-height:1.5;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td
                                                            style="width:55%;font-size:13px;color:#666666;padding:4px 0;">
                                                            Father's Status</td>
                                                        <?php $father = $db->table("occupation")->where(["id"=>$row->father_occupation])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= $father->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Mother's
                                                            Status</td>
                                                        <?php $mother = $db->table("occupation")->where(["id"=>$row->mother_occupation])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= $mother->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Brothers
                                                            Married</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= esc($row->brother_married) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Brothers
                                                            Unmarried</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= esc($row->brother_unmarried) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Sister
                                                            Married</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= esc($row->sister_married) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Sister
                                                            Unmarried</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= esc($row->sister_unmarried) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Family
                                                            Affluence</td>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= esc($row->family_type) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:4px 0;">Native
                                                            Place</td>
                                                        <?php
                                                            $country = $db->table("countries")->where(["id"=>$row->country])->get()->getFirstRow();
                                                            $state   = $db->table("states")->where(["id"=>$row->state])->get()->getFirstRow();
                                                        ?>
                                                        <td style="font-size:13px;color:#111111;padding:4px 0;">:
                                                            <?= $state->name ?? 'Not Available' ?>,
                                                            <?= esc($row->city) ?>,
                                                            <?= $country->name ?? 'Not Available' ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <!-- Basic details -->
                                        <tr>
                                            <td
                                                style="font-size:20px;font-weight:700;color:#C9302C;padding-bottom:10px;">
                                                Basic Details</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:13px;color:#333333;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td
                                                            style="width:48%;font-size:13px;color:#666666;padding:6px 0;">
                                                            Date of Birth</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= date("d-M Y", strtotime($row->dob)) ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            style="width:48%;font-size:13px;color:#666666;padding:6px 0;">
                                                            Time of Birth</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= date("h:i A", strtotime($row->time_of_birth)) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="width:48%;font-size:13px;color:#666666;padding:6px 0;">
                                                            Place of Birth</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $row->place_of_birth ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Height
                                                        </td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= esc($row->height) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Marital
                                                            Status</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= esc($row->maritalstatus) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Email
                                                            ID</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= esc($row->email) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Contact
                                                            No.</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= esc($row->phone) ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <!-- Religious -->
                                        <tr>
                                            <td style="height:12px;"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size:18px;font-weight:700;color:#C9302C;padding-bottom:8px;">
                                                Religious Background</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:13px;color:#333333;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td
                                                            style="width:48%;font-size:13px;color:#666666;padding:6px 0;">
                                                            Religion</td>
                                                        <?php $religion = $db->table("religion")->where(["id"=>$row->religion])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $religion->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Community
                                                        </td>
                                                        <?php $caste = $db->table("caste")->where(["id"=>$row->caste])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $caste->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Mother
                                                            Tongue</td>
                                                        <?php $mothertongue = $db->table("languages")->where(["id"=>$row->mothertongue])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $mothertongue->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <!-- Location & Career -->
                                        <tr>
                                            <td style="height:12px;"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size:18px;font-weight:700;color:#C9302C;padding-bottom:8px;">
                                                Location, Education &amp; Career
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:13px;color:#333333;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td
                                                            style="width:48%;font-size:13px;color:#666666;padding:6px 0;">
                                                            Living in</td>
                                                        <?php $stateLive = $db->table("states")->where(["id"=>$row->family_living])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $stateLive->name ?? 'Not Available' ?> |
                                                            <?= esc($row->city) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Grew up
                                                            in</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $country->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Highest
                                                            Qualification</td>
                                                        <?php $edu = $db->table("education")->where(["id"=>$row->highestdegree])->get()->getFirstRow(); ?>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= $edu->name ?? 'Not Available' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">College
                                                            Name</td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= esc($row->collegename) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size:13px;color:#666666;padding:6px 0;">Income
                                                        </td>
                                                        <td style="font-size:13px;color:#111111;padding:6px 0;">:
                                                            <?= esc($row->annualincome) ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- FIXED ROW (IMPORTANT) -->
                <tr>
                    <td style="padding: 10px; text-align:center;">
                        <b>
                            Note: This Content may be confidential or privileged Also, the details provided in the
                            profile are sent by the said party & our company is not responsible for any
                            misinterpretation regarding the same, "Please do not print this unless it is absolutely
                            necessary, as an initiative towards Environmental Awareness"
                        </b>
                    </td>
                </tr>

            </table>
            <!-- end container -->

        </td>
    </tr>

</table>
