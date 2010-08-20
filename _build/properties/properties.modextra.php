<?php
/**
 * modExtra
 *
 * Copyright 2010 by Shaun McCormick <shaun+modextra@modx.com>
 *
 * modExtra is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * modExtra is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * modExtra; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package modextra
 */
/**
 * Properties for the modExtra snippet.
 *
 * @package modextra
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_modextra.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Item',
        'lexicon' => 'modextra:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_modextra.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'modextra:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_modextra.sortdir_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'ASC',
        'lexicon' => 'modextra:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_modextra.limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'modextra:properties',
    ),
    array(
        'name' => 'outputSeparator',
        'desc' => 'prop_modextra.outputseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'modextra:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_modextra.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => true,
        'lexicon' => 'modextra:properties',
    ),
/*
    array(
        'name' => '',
        'desc' => 'prop_modextra.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'modextra:properties',
    ),
    */
);

return $properties;