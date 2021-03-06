<?php

/**
 * Generator base class for module README file.
 *
 * (You were going to write a README file, right?)
 *
 * No point in extending ModuleBuilderGeneratorFile; it does way too much.
 */
class ModuleBuilderGeneratorReadme extends ModuleBuilderGeneratorComponent {

  /**
   * Collect the code files.
   */
  function collectFiles(&$files) {
    $files['readme'] = array(
      'path' => '', // Means the base folder.
      // The extension is in lowercase for good reasons which I don't remember
      // right now, but probably to do with Windows being rubbish.
      'filename' => 'README.txt',
      'body' => $this->lines(),
    );
  }

  /**
   * Return an array of lines.
   *
   * @return
   *  An array of lines of text.
   */
  function lines() {
    return array(
      $this->module_data['module_readable_name'],
      str_repeat('=', strlen($this->module_data['module_readable_name'])),
      '',
      'TODO: write some documentation.',
    );
  }

}
