<?php
  require_once('includes/template.php');

  head([
    'title' => "The model definition file"
  ]);
?>

<h1>The model definition file</h1>

<p>This is a small <a href="https://www.typescriptlang.org/">TypeScript</a>
source code file that tells us how to define our model.

<p>In the case of the <strong>wordlist lexical models</strong>, the model
definition file indicates where find to find the
<a href="../../../reference/file-types/tsv.php">TSV source files</a>, as well as
gives us the option to tell the compiler a little bit more about our
language’s spelling system or <em>orthography</em>.</p>

<h2> The model definition template </h2>

<p><strong>Keyman Developer</strong> provides a default model definition
similar to the following. If you want to create the file yourself, copy-paste
the following template, and save it as <code>model.ts</code>. Place this file
in the same folder as <code>wordlist.tsv</code>.</p>

<pre><code class="lang-typescript">/*
  sencoten 1.0 generated from template.

  This is a minimal lexical model source that uses a tab delimited wordlist.
  See documentation online at https://help.keyman.com/developer/ for
  additional parameters.
*/

const source: LexicalModelSource = {
  format: 'trie-1.0',
  sources: ['wordlist.tsv'],
};
export default source;</code></pre>

<p> Let's step through this file, line-by-line.</p>

<p> On the first line, we're declaring the source code of a new lexical model. </p>
<pre><code class="lang-typescript">const source: LexicalModelSource = {</code></pre>

<p> On the second line, we're saying the lexical model will use the
<code>trie-1.0</code> format. The <code>trie</code> format creates a lexical
model from one or more word lists; the <code>trie</code> structures the
lexical model such that it can predict through thousands of words very
quickly. </p>
<pre><code class="lang-typescript">  format: 'trie-1.0',</code></pre>

<p> On the third line, we're telling the <code>trie</code> where to find our wordlist. </p>
<pre><code class="lang-typescript">  sources: ['wordlist.tsv'],</code></pre>

<p> The fourth line marks the termination of the lexical model source code. If we specify any customizations, they <strong>must</strong> be declared above this line: </p>
<pre><code class="lang-typescript">};</code></pre>

<p> The fifth line is necessary to allow external applications to read the lexical model source code.</p>
<pre><code class="lang-typescript">export default source;</code></pre>


<h2> Customizing a wordlist lexical model </h2>

<p> The template, as described in the previous section, is a good starting
point, and may be all you need for you language. However, most language
require a few customizations. The <code>trie-1.0</code> wordlist model
supports the following customizations: </p>

<dl>
  <dt> <a href="punctuation.php"> Punctuation </a> </dt>
  <dd> How to define certain punctuation in your language </dd>
  <dt> <a href="word-breaker.php"> Word breaker </a> </dt>
  <dd> How to determine when words start and end in the writing system </dd>
  <dt> <a href="search-term-to-key.php"> Search term to key </a> </dt>
  <dd> How and when to ignore accents and lettercase </dd>
</dl>

<p> To see all of the things possible in a model definition file, see the
<a href="https://github.com/keymanapp/keyman/blob/0e9877cc50b70584aafe4ff5e98aea260a743d4c/developer/js/source/lexical-model-compiler/lexical-model.ts#L12-L42"><code>LexicalModelSource</code> interface</a>.

<h2> Write your own custom model </h2>

<p> If all of the above seems too limiting, you can write your own custom
model. This means, implementing the interface of the <code>LexicalModel</code>
class, and generating predictions yourself. This is the most difficult and
time consuming option, however, it gives you the most flexibility. </p>
