<map version="freeplane 1.7.0">
<!--To view this file, download free mind mapping software Freeplane from http://freeplane.sourceforge.net -->
<node TEXT="Holiday-Definition" FOLDED="false" ID="ID_1479763703" CREATED="1592031057837" MODIFIED="1592034624020" BACKGROUND_COLOR="#ffcc00" STYLE="bubble">
<font SIZE="18"/>
<hook NAME="MapStyle">
    <properties show_icon_for_attributes="true" fit_to_viewport="false" show_note_icons="true" edgeColorConfiguration="#808080ff,#ff0000ff,#0000ffff,#00ff00ff,#ff00ffff,#00ffffff,#7c0000ff,#00007cff,#007c00ff,#7c007cff,#007c7cff,#7c7c00ff"/>

<map_styles>
<stylenode LOCALIZED_TEXT="styles.root_node" STYLE="oval" UNIFORM_SHAPE="true" VGAP_QUANTITY="24.0 pt">
<font SIZE="24"/>
<stylenode LOCALIZED_TEXT="styles.predefined" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="default" ICON_SIZE="12.0 pt" COLOR="#000000" STYLE="fork">
<font NAME="SansSerif" SIZE="10" BOLD="false" ITALIC="false"/>
</stylenode>
<stylenode LOCALIZED_TEXT="defaultstyle.details"/>
<stylenode LOCALIZED_TEXT="defaultstyle.attributes">
<font SIZE="9"/>
</stylenode>
<stylenode LOCALIZED_TEXT="defaultstyle.note" COLOR="#000000" BACKGROUND_COLOR="#ffffff" TEXT_ALIGN="LEFT"/>
<stylenode LOCALIZED_TEXT="defaultstyle.floating">
<edge STYLE="hide_edge"/>
<cloud COLOR="#f0f0f0" SHAPE="ROUND_RECT"/>
</stylenode>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.user-defined" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="styles.topic" COLOR="#18898b" STYLE="fork">
<font NAME="Liberation Sans" SIZE="10" BOLD="true"/>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.subtopic" COLOR="#cc3300" STYLE="fork">
<font NAME="Liberation Sans" SIZE="10" BOLD="true"/>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.subsubtopic" COLOR="#669900">
<font NAME="Liberation Sans" SIZE="10" BOLD="true"/>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.important">
<icon BUILTIN="yes"/>
</stylenode>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.AutomaticLayout" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="AutomaticLayout.level.root" COLOR="#000000" STYLE="oval" SHAPE_HORIZONTAL_MARGIN="10.0 pt" SHAPE_VERTICAL_MARGIN="10.0 pt">
<font SIZE="18"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,1" COLOR="#0033ff">
<font SIZE="16"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,2" COLOR="#00b439">
<font SIZE="14"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,3" COLOR="#990000">
<font SIZE="12"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,4" COLOR="#111111">
<font SIZE="10"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,5"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,6"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,7"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,8"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,9"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,10"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,11"/>
</stylenode>
</stylenode>
</map_styles>
</hook>
<hook NAME="AutomaticEdgeColor" COUNTER="16" RULE="ON_BRANCH_CREATION"/>
<node TEXT="Identifier" POSITION="right" ID="ID_914995599" CREATED="1592031287881" MODIFIED="1592034227087" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The country wide, unique, holiday identifier. A good idea is to use the english holiday name here. So most people&#160;know what holiday means.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="Name" POSITION="right" ID="ID_1924229518" CREATED="1592032166049" MODIFIED="1592034227089" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The country home language holiday name. If there are more than 1 Languages simple select one
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="NameTranslations" POSITION="right" ID="ID_799629855" CREATED="1592032342557" MODIFIED="1592034227089" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      Optional name translations. Keys are the 2 char country codes like 'de', 'fr', 'cz'
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="Description" POSITION="right" ID="ID_1289318410" CREATED="1592032442115" MODIFIED="1592034227089" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      An optional holiday description.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="Static-Month" POSITION="right" ID="ID_1257027471" CREATED="1592031460737" MODIFIED="1592034227089" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The holiday date month or NULL if the holiday is not static.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="Static-Day" POSITION="right" ID="ID_241894377" CREATED="1592031564079" MODIFIED="1592034227089" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The holiday date day of month or NULL if the holiday is not static.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="DynamicDateCallback" POSITION="right" ID="ID_871291083" CREATED="1592031645813" MODIFIED="1592494800244" BACKGROUND_COLOR="#ccffcc" STYLE="bubble">
<font SIZE="12"/>
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The callback for calculate a dynamic date.
    </p>
  </body>
</html>
</richcontent>
<node TEXT="AdventDateCallback&#xa;EasterDateCallback&#xa;GenericDateCallback&#xa;ModifyDateCallback&#xa;NamedDateCallback&#xa;SeasonDateCallback" ID="ID_1082972593" CREATED="1592494672951" MODIFIED="1592494822942" BACKGROUND_COLOR="#ccffff" STYLE="bubble"/>
</node>
<node TEXT="BaseCallbackName" POSITION="right" ID="ID_1896452429" CREATED="1592032065516" MODIFIED="1592034509714" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The name of a global callback, used to calculate an specific base date that will be used to build the final holiday date in combination with the difference days value. The callback function must be registered globally by defined name.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="ValidFromYear" POSITION="right" ID="ID_1709120923" CREATED="1592032566512" MODIFIED="1592034509714" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The year where the holiday starts to be valid. NULL means no restriction.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="ValidToYear" POSITION="right" ID="ID_90254295" CREATED="1592032584148" MODIFIED="1592034509715" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The year where the holiday ends to be valid. NULL means no restriction.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="MoveConditions" POSITION="right" ID="ID_82186535" CREATED="1592032738516" MODIFIED="1592034361622" BACKGROUND_COLOR="#ccffcc" STYLE="bubble">
<font SIZE="12"/>
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      0-n conditions, used to move the current holiday declaration date by days, if the condition matches.
    </p>
    <p>
      Only the first matching condition moves the date. If you want to let move the date by all matching conditions&#160;one by one, you have to set MoveAllMatches to true.
    </p>
  </body>
</html>
</richcontent>
<node TEXT="MoveCondition" ID="ID_974639168" CREATED="1592033829539" MODIFIED="1592034558983" BACKGROUND_COLOR="#ffffcc" STYLE="bubble">
<node TEXT="Callback" ID="ID_1337847886" CREATED="1592033860094" MODIFIED="1592034574511" STYLE="bubble"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The Condition callback. It must accept a single parameter of type {@see \DateTimeInterface},&#160;and must return boolean (true if the condition matches the date, false otherwise)
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="DaysToMove" ID="ID_753386109" CREATED="1592033889386" MODIFIED="1592034574515" STYLE="bubble"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      how many days a date should be moved if the condition matches the checked date
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="AcceptedRegions" ID="ID_456173670" CREATED="1592033909069" MODIFIED="1592034574515" STYLE="bubble"><richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      he indexes of all country regions where this MoveCondition can be used for.&#160;A empty array or [ -1 ] means holidays of all regions handle this condition
    </p>
  </body>
</html>
</richcontent>
</node>
</node>
</node>
<node TEXT="MoveAllMatches" POSITION="right" ID="ID_533726764" CREATED="1592032831373" MODIFIED="1592034414812" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      Set it to TRUE if you want handle the changes of all matching move conditions. With default FALSE, only the first matching condition moves the date.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="ValidationCallback" POSITION="right" ID="ID_83166097" CREATED="1592032896844" MODIFIED="1592034456292" BACKGROUND_COLOR="#ccffcc" STYLE="bubble">
<font SIZE="12"/>
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The optional callback to validate the current holiday definition date. If defined it must check the current used date and should return TRUE if the date is valid, FALSE otherwise.
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="Regions" POSITION="right" ID="ID_1911332713" CREATED="1592032986338" MODIFIED="1592034497586" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      The indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions or if&#160;there are no regions
    </p>
  </body>
</html>
</richcontent>
</node>
<node TEXT="IsRestDay" POSITION="right" ID="ID_491745228" CREATED="1592032994981" MODIFIED="1592034497587" STYLE="bubble">
<edge COLOR="#000000"/>
<richcontent TYPE="NOTE">

<html>
  <head>
    
  </head>
  <body>
    <p>
      Define if the holiday is a rest day (work free day)
    </p>
  </body>
</html>
</richcontent>
</node>
</node>
</map>
