import {Korisnik} from "./Korisnik.entity";
import {Film} from "./Film.entity";
import {Column, Entity, Index, JoinColumn, ManyToOne, PrimaryGeneratedColumn} from "typeorm"
import {IsInt, IsString, Max, Min} from "class-validator"

@Entity()
@Index(["korisnik", "film"], { unique: true })
export class Ocena{

     @PrimaryGeneratedColumn()
     public ocenaId: number;

     @ManyToOne(type => Korisnik, korisnik => korisnik.ocene,{cascade: true, onUpdate: "CASCADE"})
     @JoinColumn({name: "korisnikId"})
     korisnik: Korisnik;

     @ManyToOne(type => Film, film => film.ocene,{cascade: true, onUpdate: "CASCADE"})
     @JoinColumn({name: "filmId"})
     film: Film;

     @Column({name: "brojcana_ocena"})
     @IsInt()
     @Min(0)
     @Max(5)
     brojcanaOcena: number;

     @Column({type: "text"})
     @IsString()
     komentar: string;
}