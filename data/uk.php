<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 * @version        0.1.0alpha (AK47)
 */


use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\DateMove\MoveCondition;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'United Kingdom', 'uk', 'en' )
    ->setRegions( [
        'Alderney',         // 0
        'England',          // 1
        'Guernsey',         // 2
        'Isle of Man',      // 3
        'Jersey',           // 4
        'North Ireland',    // 5
        'Scotland',         // 6
        'Wales'             // 7
    ] )

    ->addRange(

        #region // 01-01 New Year's Day
        Definition::CreateNewYear()
            // move to next day if date is a sunday (England + Wales)
            ->addMoveCondition( MoveCondition::OnSunday( 1 )->setAcceptedRegions( [ 1, 7 ] ) )
            // move 2 days in future if date is a saturday (England + Wales)
            ->addMoveCondition( MoveCondition::OnSaturday( 2 )->setAcceptedRegions( [ 1, 7 ] ) )
            // Move 01-01 (New Years's Day) holiday to next tuesday if it was on a sunday (Scotland only)
            ->addMoveCondition( MoveCondition::OnSunday( 2 )->setAcceptedRegions( [ 6 ] ) )
            // Move 01-01 (New Years's Day) holiday to next tuesday if it was on a saturday (Scotland only)
            ->addMoveCondition( MoveCondition::OnSaturday( 3 )->setAcceptedRegions( [ 6 ] ) ),
        #endregion

        #region // 01-02 Scottish New Years's Day
        Definition::Create( 'Scottish New Years\'s Day' )
            ->setStaticDate( 1, 2 )
            // move to next day if date is a sunday
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
            // move 2 days in future if date is a saturday
            ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
            ->setValidRegions( [ 6 ] ), // <- Scotland
        #endregion

        #region // 03-17 : Saint Patrick's Day…
        Definition::Create( 'Saint Patrick\'s Day' )
            ->setStaticDate( 3, 17 )
            // move to next day if date is a sunday
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
            // move 2 days in future if date is a saturday
            ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
            ->setValidRegions( [ 5 ] ), // <- North Ireland
        #endregion

        #region // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // Early May Bank Holiday - The 1st monday in mai
        Definition::Create( 'Early May Bank Holiday' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first monday of may ' ) ),
        #endregion

        #region // 05-09 : Liberation Day
        Definition::Create( 'Liberation Day' )
            ->setStaticDate( 5, 9 )
            ->setValidRegions( [ 2, 4 ] ), // <- Guernsey, Jersey
        #endregion

        #region // Spring Bank Holiday - The last monday of mai
        Definition::Create( 'Spring Bank Holiday' )
            ->setDynamicDateCallback( new NamedDateCallback( 'last monday of may ' ) ),
        #endregion

        #region // Tourist Trophy Senior Race Day - 2nd friday of june
        Definition::Create( 'Tourist Trophy Senior Race Day' )
            ->setDynamicDateCallback( new NamedDateCallback( 'second friday of june ' ) )
            ->setValidRegions( [ 3 ] ), // <- Isle of Man
        #endregion

        #region // 07-05 : Tynwald Day
        Definition::Create( 'Tynwald Day' )
            ->setStaticDate( 7, 5 )
            ->setValidRegions( [ 3 ] ), // <- Isle of Man
        #endregion

        #region // 07-12 : Battle of the Boyne
        Definition::Create( 'Battle of the Boyne' )
            ->setStaticDate( 7, 12 )
            // move to next day if date is a sunday
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
            // move 2 days in future if date is a saturday
            ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
            ->setValidRegions( [ 5 ] ), // <- North Ireland
        #endregion

        #region // August Bank Holiday - 1st monday of august
        Definition::Create( 'August Bank Holiday Scotland' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first monday of august ' ) )
            ->setValidRegions( [ 6 ] ), // <- Scotland
        #endregion

        #region // August Bank Holiday - last monday of august
        Definition::Create( 'August Bank Holiday' )
            ->setDynamicDateCallback( new NamedDateCallback( 'last monday of august ' ) )
            ->setValidRegions( [ 1, 7 ] ), // <- England, Wales
        #endregion

        #region // Thanksgiving
        Definition::Create( 'Thanksgiving' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-15 : Homecoming Day
        Definition::Create( 'Homecoming Day' )
            ->setStaticDate( 12, 15 )
            ->setValidRegions( [ 0 ] ), // <- Alderney
        #endregion

        #region // 12-25 : Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 )
            ->addMoveCondition( MoveCondition::OnSunday( 2 ) )
            ->addMoveCondition( MoveCondition::OnSaturday( 3 ) )
            ->setValidRegions( [ 1, 2, 3, 4, 5, 6, 7 ] ),
        #endregion

        #region // 12-26 : Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 )
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
            ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

