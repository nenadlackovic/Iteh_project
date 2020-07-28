import {Entity, Column, PrimaryGeneratedColumn, ManyToOne, JoinColumn, OneToMany, Index} from 'typeorm';
import {Korisnik} from "./Korisnik.entity";
import {Reziser} from "./Reziser.entity";
import {Zanr} from "./Zanr.entity";
import {Ocena} from "./Ocena.entity";
import {IsString, IsInt, Min, Max, IsPositive} from "class-validator";

@Entity()
@Index(["ImeFilma", "GodinaProizvodnje"], { unique: true })
export class Film{
    @PrimaryGeneratedColumn({name: "Film_Id"})
    FilmId: number;

    @Column({name: "Ime_Filma"})
    @IsString()
    ImeFilma: string;

    @Column({name: "Godina_proizvodnje"})
    @IsInt()
    @Min(1900)
    @Max(2100)
    GodinaProizvodnje: number;

    @Column({name: "Trajanje"})
    @IsInt()
    @IsPositive()
    Trajanje: number;


    @Column({name: "Poster"})
    @IsString()
    Poster: string

    @Column({name: "Opis"})
    @IsString()
    Opis: string

    @ManyToOne(type => Korisnik, korisnik => korisnik.filmovi, {cascade: true, onUpdate: "CASCADE"})
    @JoinColumn({name: "korisnik_id"})
    korisnik: Korisnik;

    @ManyToOne(type => Reziser, reziser => reziser.filmovi,{cascade: true, onUpdate: "CASCADE"})
    @JoinColumn({name: "reziser_id"})
    reziser: Reziser;

    @ManyToOne(type => Zanr, zanr => zanr.filmovi, {cascade: true, onUpdate: "CASCADE"})
    @JoinColumn({name: "zanr_id"})
    zanr: Zanr;
    @OneToMany(type => Ocena, ocena => ocena.film)
    ocene: Ocena[];

}